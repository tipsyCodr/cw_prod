<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // function to add blog
    public function add_blog($image, $caption)
    {
        $data = array(
            'user_id' => $this->session->userdata('login'),

            'image_url' => $image,
            'content' => $caption,

        );

        if ($this->db->insert('posts', $data)) {
            return true;
        } else {
            return false;
        }

    }
    public function banPost($id)
    {
        try {
            $this->db->where('post_id', $id);
            $this->db->update('posts', array('admin_ban' => 1));
            return true;
        } catch (Exception $e) {
            log_message('error', 'Error banning post: ' . $e->getMessage());
            return false;
        }

    }
    public function unBanPost($id)
    {

        try {
            $this->db->where('post_id', $id);
            $this->db->update('posts', array('admin_ban' => 0));
            return true;
        } catch (Exception $e) {
            log_message('error', 'Error banning post: ' . $e->getMessage());
            return false;
        }

    }
    // function to get all blog posts
    public function get_all_blog_posts()
    {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->order_by('post_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_all_blog_posts_with_user()
    {
        $this->db->select('posts.*, user_registration.user_name,user_registration.user_profile_pic,user_registration.user_verified_status');
        $this->db->from('posts');
        $this->db->join('user_registration', 'user_registration.uid = posts.user_id');
        $this->db->order_by('post_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getPostLikes($post_id)
    {
        $this->db->select('like_id');
        $this->db->from('likes');
        $this->db->where('post_id', $post_id);
        $q = $this->db->get();
        return (int) $q->num_rows();
    }
    public function isLikedByUser($post_id, $user_id)
    {
        return (bool) $this->db
            ->select('like_id')
            ->from('likes')
            ->where(['user_id' => $user_id, 'post_id' => $post_id])
            ->get()
            ->num_rows();

    }
    public function likePost($post_id, $user_id)
    {
        $this->db->select('like_id');
        $this->db->from('likes');
        $this->db->where(['user_id' => $user_id, 'post_id' => $post_id]);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $like = $query->row_array();
            $this->db->delete('likes', ['like_id' => $like['like_id']]);
            return array("status" => "unliked");

        } else {
            $data = array(
                'user_id' => $user_id,
                'post_id' => $post_id
            );
            $this->db->insert('likes', $data);
            return array("status" => "liked");
        }
        return 'failed';

    }
    public function getSinglePost($post_id)
    {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('post_id', $post_id);
        $query = $this->db->get();
        return $query->row();
    }
    public function handleLikes($post_id)
    {
        // Ensure user is logged in
        $uid = $this->session->userdata('login');
        if (!$uid) {
            return ["status" => "error", "like_count" => 0]; // or handle as needed
        }

        // Fetch the current post data
        $blog_data = $this->getSinglePost($post_id);
        $newlikes = '';

        // Check if the post has any likes
        if (!empty($blog_data->post_likes)) {

            $post_likes = explode(",", $blog_data->post_likes);

            if (($key = array_search($uid, $post_likes)) !== false) {
                // User has already liked the post, so remove the like
                unset($post_likes[$key]);
                $newlikes = implode(",", $post_likes);
                $status = "disliked";
            } else {
                // User has not liked the post yet, so add their like
                $post_likes[] = $uid;
                $newlikes = implode(",", $post_likes);
                $status = "liked";
            }
        } else {
            // No likes yet, so add the user's like
            $newlikes = $uid;
            $status = "liked";
        }

        // Update the post likes in the database
        $this->db->where('post_id', $post_id);
        $this->db->update('posts', array('post_likes' => $newlikes));

        // Check if the update was successful
        if (!$this->db->affected_rows()) {
            log_message('error', 'Failed to update post likes for post_id ' . $post_id);
        }

        // Calculate the new like count
        $like_count = $newlikes ? count(array_filter(explode(',', $newlikes))) : 0;

        return ["status" => $status, "like_count" => $like_count];
    }

    public function postedBy($post_id)
    {
        $this->load->model('Userregistrationmodel');
        $this->load->model('Blog_model');
        $data['user'] = $this->db->get_where('user_registration', array('uid' => $this->getSinglePost($post_id)->user_id))->row();
        return $data['user'];
    }

    public function getComments($post_id)
    {

        $this->db->select('comments.*, user_registration.*');
        $this->db->from('comments');
        $this->db->join('user_registration', 'comments.user_id = user_registration.uid');
        $this->db->where('comments.post_id', $post_id);
        $query = $this->db->get();
        $comment_data = $query->result_array();
        return $comment_data;
    }
    public function adminDeleteComment($id)
    {
        try {
            $this->db->where('comment_id', $id);
            $this->db->set('admin_delete', 1);
            $this->db->update('comments');
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function adminRestoreComment($id)
    {
        try {
            $this->db->where('comment_id', $id);
            $this->db->set('admin_delete', 0);
            $this->db->update('comments');
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function userDeleteComment($id)
    {
        try {
            $this->db->where('comment_id', $id);
            $this->db->set('admin_delete', 0);
            $this->db->update('comments');
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function getAllComments()
    {
        $this->db->select('comments.*, user_registration.*');
        $this->db->from('comments');
        $this->db->join('user_registration', 'comments.user_id = user_registration.uid');
        $query = $this->db->get();
        $comment_data = $query->result_array();
        return $comment_data;
    }

    public function add_comment($commentdata)
    {

        $data = array(
            'comment_text' => $commentdata['comment'],
            'post_id' => $commentdata['blog_id'],
            'user_id' => $this->session->userdata('login'),
            'created_at' => date('Y-m-d H:i:s')
        );
        print_r($data);
        if ($this->db->insert('comments', $data)) {
            return true;
        } else {
            return false;
        }

    }


}
