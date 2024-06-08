<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style> 
        .error-message {
            color: red;
        }
        h2 {
            text-align: center;
            margin-top: 4rem;
            margin-bottom: 4rem;
        }
        form {
            max-width: 400px;  
            margin: auto;  
        }
        .form-control {
            width: 80%;
        }
    </style>
</head>
<body>
    <h2>Add Employee</h2>
    <form id="studentForm" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="e_id">E_ID:</label>
            <input type="number" class="form-control" id="e_id" name="e_id">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" name="city">
        </div>
        <div class="form-group">
            <label for="resume">Resume (PDF):</label>
            <input type="file" class="form-control" id="resume" name="resume">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     
      

     <script>
        $(document).ready(function() {
            $('#studentForm').submit(function(event) {
                event.preventDefault();  
                var name = $('#name').val().trim();
                var e_id = $('#e_id').val().trim();
                var phone = $('#phone').val().trim();
                var email = $('#email').val().trim();
                var city = $('#city').val().trim();
                var resume = $('#resume').val().trim();
        
                var formValid = true;  
        
                // Check name
                if (name === '') {
                    $('#name').after('<span class="error-message">This field is required</span>');
                    formValid = false;
                }
        
                // Check email
                if (email === '') {
                    $('#email').after('<span class="error-message">This field is required</span>');
                    formValid = false;
                }
        
                // Check E_ID
                if (e_id === '') {
                    $('#e_id').after('<span class="error-message">This field is required</span>');
                    formValid = false;
                }
        
                // Check phone
                if (phone === '') {
                    $('#phone').after('<span class="error-message">This field is required</span>');
                    formValid = false;
                } else if (phone.length !== 10) {
                    $('#phone').after('<span class="error-message">Phone number must be exactly 10 digits long</span>');
                    formValid = false;
                }
                // Check city
                if (city === '') {
                    $('#city').after('<span class="error-message">This field is required</span>');
                    formValid = false;
                }
        
                // Check resume
                if (resume === '') {
                    $('#resume').after('<span class="error-message">This field is required</span>');
                    formValid = false;
                } 
                if (!formValid) {
                    return;  
                }
         
                var formData = new FormData(this);
        
                // Send AJAX request
                $.ajax({
                    url: '{{ route("employees.store") }}',  
                    type: 'POST',
                    data: formData,
                    processData: false,  
                    contentType: false,  
                    success: function(response) {
                        alert('Employee added successfully!');
                        // Redirect to another page
                        window.location.href = '{{ route("employees.student") }}';
                    },
                    error: function(xhr, status, error) {
                        console.error(error); 
                        var errorMessage = xhr.responseJSON.message;
                        if (errorMessage === "Email already exists. Please use a different email.") {
                            alert(errorMessage);
                        } else if (errorMessage === "E_ID already exists. Please use a different E_ID.") {
                            alert(errorMessage);
                        } else {
                            alert('Failed to add employee. Please try again.');
                        }
                    }
                });
            });
        });
        </script>
        
    
</body>
</html>
