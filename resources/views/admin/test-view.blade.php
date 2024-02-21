<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Form on Button Click</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>

    <button id="showFormButton">Show Form</button>

    <div id="formContainer" class="hidden">
        <form>
            <!-- Your form elements go here -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <!-- Add more form elements as needed -->
            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        document.getElementById('showFormButton').addEventListener('click', function() {
            var formContainer = document.getElementById('formContainer');
            formContainer.classList.toggle('hidden');
        });
    </script>
</body>

</html>
