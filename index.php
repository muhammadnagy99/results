<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Exam Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Loader CSS */
        .loader {
            border: 4px solid #f3f3f3;
            border-radius: 50%;
            border-top: 4px solid #3498db;
            width: 40px;
            height: 40px;
            animation: spin 2s linear infinite;
            display: none;
            /* Hidden by default */
            margin: 20px auto;
            /* Center it */
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="mt-5">Search Student Exam Results</h2>
        <form id="search-form" class="mt-3">
            <div class="mb-3">
                <label for="student_name" class="form-label">Student Name:</label>
                <input type="text" name="student_name" id="student_name" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <div id="loader" class="loader"></div> <!-- Loader element -->
        <div id="result-container" class="mt-5"></div>
    </div>

    <script>
        document.getElementById('search-form').addEventListener('submit', function(e) {
            e.preventDefault();
            var studentName = document.getElementById('student_name').value;

            // Show the loader
            document.getElementById('loader').style.display = 'block';

            fetch('search_result.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'student_name=' + encodeURIComponent(studentName),
                })
                .then(response => response.text())
                .then(data => {
                    // Hide the loader
                    document.getElementById('loader').style.display = 'none';

                    // Display the result
                    document.getElementById('result-container').innerHTML = data;
                })
                .catch(error => {
                    // Hide the loader
                    document.getElementById('loader').style.display = 'none';

                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>