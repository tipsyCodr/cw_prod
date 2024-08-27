<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');


/**
 * @property email $email
 */

if (!function_exists('send_email')) {
    function send_email($to, $subject, $message, $from = '', $from_name = '', $cc = '', $bcc = '')
    {
        // Get CodeIgniter instance
        $CI =& get_instance();

        // Load the email library
        $CI->load->library('email');

        // Email configuration
        // $config = array(
        //     'protocol'  => 'smtp',  // Use 'mail', 'sendmail', or 'smtp'
        //     'smtp_host' => 'your_smtp_host',  // SMTP server host (e.g., smtp.gmail.com)
        //     'smtp_port' => 587,  // SMTP port (usually 25, 465, or 587)
        //     'smtp_user' => 'your_email@example.com',  // Your SMTP username (usually an email address)
        //     'smtp_pass' => 'your_email_password',  // Your SMTP password
        //     'mailtype'  => 'html',  // Mail type: 'text' or 'html'
        //     'charset'   => 'utf-8',
        //     'newline'   => "\r\n",
        //     'wordwrap'  => TRUE
        // );
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'sandbox.smtp.mailtrap.io',
            'smtp_port' => 2525,
            'smtp_user' => 'f82ca4373d2e6a',
            'smtp_pass' => '1a69808230acc0',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        );

        // Initialize email configuration
        $CI->email->initialize($config);

        // Set email parameters
        $CI->email->from($from, $from_name);
        $CI->email->to($to);

        if ($cc) {
            $CI->email->cc($cc);
        }
        if ($bcc) {
            $CI->email->bcc($bcc);
        }

        $CI->email->subject($subject);
        $CI->email->message($message);

        // Send the email
        if ($CI->email->send()) {
            return TRUE;
        } else {
            // Print the error message if the email failed to send
            return $CI->email->print_debugger();
        }
    }
}
