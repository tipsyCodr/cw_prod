<!-- Include jQuery UI JS -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function () {
        // function for height filter 
        $("#height-slider").slider({
            range: true,
            min: 48, // Minimum height in inches (4 ft)
            max: 84, // Maximum height in inches (7 ft)
            values: [48, 84], // Default start and end values
            step: 1,
            slide: function (event, ui) {
                // Update hidden input fields with the selected values
                $("#from_height").val(ui.values[0]);
                $("#to_height").val(ui.values[1]);

                // Update displayed values
                $("#from_height_display").text(convertToFeetInches(ui.values[0]));
                $("#to_height_display").text(convertToFeetInches(ui.values[1]));
            }
        });

        function convertToFeetInches(value) {
            var feet = Math.floor(value / 12);
            var inches = value % 12;
            return feet + "-" + inches + " ft";
        }

        // Initialize displayed values
        $("#from_height_display").text(convertToFeetInches($("#from_height").val()));
        $("#to_height_display").text(convertToFeetInches($("#to_height").val()));

        $("#age-slider").slider({
            range: true,
            min: 18, // Minimum age
            max: 65, // Maximum age
            values: [<?= $results['from_age'] ?>, <?= $results['to_age'] ?>], // Default start and end values
            step: 1,
            slide: function (event, ui) {
                // Update hidden input fields with the selected values
                $("#from_age").val(ui.values[0]);
                $("#to_age").val(ui.values[1]);

                // Update displayed values
                $("#from_age_display").text(ui.values[0] + " Year");
                $("#to_age_display").text(ui.values[1] + " Year");
                member_Filter();
            }
        });

        // Initialize displayed values
        $("#from_age_display").text($("#from_age").val() + " Year");
        $("#to_age_display").text($("#to_age").val() + " Year");


        document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(button => {
            button.addEventListener('click', function () {
                const icon = this.querySelector('.rotate-icon');
                icon.classList.toggle('rotate');
            });
        });


    });
    function select_all_checkbox(containerClass) {
        document.querySelectorAll(`.${containerClass} input[type=checkbox]`).forEach(checkbox => {
            checkbox.checked = true;
        });
    }

    function clear_refine(containerClass) {
        document.querySelectorAll(`.${containerClass} input[type=checkbox]`).forEach(checkbox => {
            checkbox.checked = false;
        });
    }

    // Common Search Functionality
    function filterContent(containerId, searchTerm) {
        const searchInput = searchTerm.toLowerCase();
        const checkboxes = document.querySelectorAll(`#${containerId} .form-check`);

        checkboxes.forEach(function (checkbox) {
            const label = checkbox.querySelector('.form-check-label').textContent.toLowerCase();
            if (label.includes(searchInput)) {
                checkbox.style.display = '';
            } else {
                checkbox.style.display = 'none';
            }
        });
    }

    function loadCities() {
        let selectedStates = [];
        const checkboxes = document.querySelectorAll('.state-checkbox:checked');

        checkboxes.forEach((checkbox) => {
            selectedStates.push(checkbox.value);
        });

        if (selectedStates.length > 0) {
            $.ajax({
                url: '<?= base_url("matrimonialcontrollers/MatriMonialController/get_cities_by_states"); ?>', // Adjust URL if necessary
                type: 'POST',
                dataType: 'json',
                data: { state_ids: selectedStates },
                success: function (response) {
                    let cityContainer = $('.city_list');
                    cityContainer.empty();

                    if (response.length > 0) {
                        response.forEach(function (city) {
                            let cityElement = `
                        <div class="box">
                            <div class="form-check">
                                <input class="form-check-input city-checkbox" type="checkbox" value="${city.city_id}" id="city${city.city_id}" data-city-id="${city.city_id}" onchange="member_Filter()">
                                <label class="form-check-label" for="city${city.city_id}">${city.city}</label>
                            </div>
                        </div>

                    `;
                            cityContainer.append(cityElement);
                        });
                    } else {
                        cityContainer.append('<p>No cities found.</p>');
                    }
                },
                error: function (xhr, status, error) {
                    console.log('Error: ' + error);
                }
            });
        } else {
            $('.city_list').empty(); // Clear the city list if no states are selected
        }
    }


    function member_Filter() {
        var gender = $("input[name='gender']:checked").val();
        var from_age = $("#from_age").val();
        var to_age = $("#to_age").val();
        var states = getCheckedIds('state');
        var cities = getCheckedIds('city');
        var motherTongues = getCheckedIds('mother-tongue');
        var Educations = getCheckedIds('education');
        var EmployeeIn = getCheckedIds('employee-in');
        //var photo_search = $("#photo_search").is(":checked") ? true : false; 
        $.ajax({
            url: 'matrimonialcontrollers/MatriMonialController/member_filter', // Replace with your actual controller path
            type: 'POST',
            data: {
                gender: gender,
                from_age: from_age,
                to_age: to_age,
                states: states,
                cities: cities,
                motherTongues: motherTongues,
                Educations: Educations,
                EmployeeIn:EmployeeIn,
               // photo_search:photo_search,
            },
            success: function (response) {
                // Parse JSON response
                try {
                    var data = JSON.parse(response);
                    $('#total-matches').html(data.matches.length + ' Matches');
                    $("#results-container").empty();

                    if (Array.isArray(data.matches)) {
                        if (data.matches.length > 0) {
                            data.matches.forEach(function (result) {
                                var html = `
                            <div class="m-b ">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <a target="_blank" href="https://shaadi.telisahusamaj.in/search/view-profile/${result.uid}">
                                            <img src="uploads/matrimonial_img/user_images/${result.images}" 
                                                 class="img-responsive placeholder-img" 
                                                 title="${result.user_name}" 
                                                 alt="${result.user_id}">
                                        </a>
                                        <div class="profile-card-btn">
                                            <a href="https://shaadi.telisahusamaj.in/search/view-profile/${result.uid}" 
                                               class="s-card-1 OpenSans-Light">View Full Profile</a>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <hr class="search-r-hr">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 margin-top-10 right-hr new-p">
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <p class="sr1 Roboto-Bold">Name:</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 float-end">
                                                    <p class="sr2 Roboto-Bold">${result.user_name}</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <p class="sr1 Roboto-Bold">Age / Height:</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 float-end">
                                                    <p class="sr2 Roboto-Bold">${result.age} Years, ${result.height}</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <p class="sr1 Roboto-Bold">Religion:</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 float-end">
                                                    <p class="sr2 Roboto-Bold">Hindu</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <p class="sr1 Roboto-Bold">Mother Tongue:</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 float-end">
                                                    <p class="sr2 Roboto-Bold">${result.mother_tongue}</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <p class="sr1 Roboto-Bold">Education:</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 float-end">
                                                    <p class="sr2 Roboto-Bold">${result.education}</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <p class="sr1 Roboto-Bold">Occupation:</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 float-end">
                                                    <p class="sr2 Roboto-Bold">${result.job_occupation}</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <p class="sr1 Roboto-Bold">Annual Income:</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 float-end">
                                                    <p class="sr2 Roboto-Bold">${result.salary}</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <p class="sr1 Roboto-Bold">Location:</p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 float-end">
                                                    <p class="sr2 Roboto-Bold">${result.user_address}, ${result.user_pincode} ${result.city}, ${result.user_state}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <p class="sr3">${result.description}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;

                                $("#results-container").append(html);
                            });
                        } else {
                            $("#results-container").html("<p class='fs-1 text-center font-weight-bold'>No Matches found</p>");
                        }
                    } else {
                        $("#results-container").html("<p>Unexpected response format.</p>");
                    }
                } catch (e) {
                    console.error("Failed to parse response JSON:", e);
                    $("#results-container").html("<p>An error occurred while processing the response.</p>");
                }
            },
            error: function (xhr, status, error) {
                // Handle any errors
                console.log("Error: " + error);
                $("#results-container").html("<p>An error occurred while fetching data.</p>");
            }
        });
    }

    function getCheckedIds(className) {
        var checkedIds = [];
        $('.' + className + '-checkbox:checked').each(function () {
            var id = $(this).data(className + '-id');
            if (id) { // Check if id is valid
                checkedIds.push(id);
            }
        });

        if (checkedIds.length === 0) {
            checkedIds = [];
        }

        console.log(checkedIds);
        return checkedIds;
    }



</script>