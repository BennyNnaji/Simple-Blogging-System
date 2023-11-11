
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Inline styles - Tailwind classes */
        @import 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css';
    </style>
</head>
<body class="font-sans bg-gray-100 h-screen">
    <table class="w-full max-w-md mx-auto mt-4 bg-white rounded-lg shadow-lg">
        <!-- Header -->
        <tr>
            <td class="px-6 py-4 bg-gray-800 text-white text-center">New Email</td>
        </tr>
        <!-- Main Content -->
        <tr>
            <td class="px-6 py-4 text-wrap">
                <h1 class="text-xl font-semibold text-gray-800">Hello, Admin</h1>
                <p class="text-gray-700">You have a new messsage from the contact form of your website {{ env('APP_NAME') }} from  <strong>{{$name }} </strong> with the subject: <strong>{{ $subject }}</strong></p>
                <p class="text-gray-700"> message </p>
                    <h1 class="text-gray-800">Their contact details as follows:</h1>  <br>
                    <strong>Message: </strong>  {{ $contact_message }} <br> 
                  <strong>Email: </strong>  {{ $email }} <br> 
                <strong>  Phone: </strong>{{$phone}} <br>                
                </p>
            </td>
        </tr>
        <!-- Footer -->
        <tr>
            <td class="px-6 py-4 bg-gray-200 text-center text-sm text-gray-600">
                &copy; 2023 EWT Blog. All Rights Reserved.
            </td>
        </tr>
    </table>
</body>
</html>
