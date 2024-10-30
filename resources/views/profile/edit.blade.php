<style>
    /* Container Styling */
form {
    max-width: 640px;
    margin: 0 auto;
    padding: 1.5rem;
    background-color: white;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

/* Success Message */
.bg-green-100 {
    background-color: #d1fae5;
    color: #065f46;
    border: 1px solid #10b981;
    padding: 1rem;
    border-radius: 8px;
    margin-bottom: 1rem;
}

/* Label Styling */
form label {
    display: block;
    color: #4a5568;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

/* Input Styling */
form input[type="text"],
form input[type="email"],
form input[type="password"],
form input[type="file"] {
    width: 100%;
    padding: 0.5rem 1rem;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 1rem;
    color: #374151;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
    margin-bottom: 1rem;
}

form input[type="text"]:focus,
form input[type="email"]:focus,
form input[type="password"]:focus,
form input[type="file"]:focus {
    border-color: #3b82f6;
    box-shadow: 0px 0px 0px 4px rgba(59, 130, 246, 0.1);
}

/* Button Styling */
form button[type="submit"] {
    width: 100%;
    background-color: #3b82f6;
    color: white;
    padding: 0.75rem 1rem;
    border-radius: 8px;
    font-weight: 600;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.2s;
    outline: none;
    border: none;
}

form button[type="submit"]:hover {
    background-color: #2563eb;
}

form button[type="submit"]:focus {
    box-shadow: 0px 0px 0px 4px rgba(59, 130, 246, 0.3);
}

/* Optional Margin for Each Form Group */
.mb-4 {
    margin-bottom: 1rem;
}

</style>
@if (session('success'))
    <div class="bg-green-100 text-green-700 border border-green-400 p-4 rounded-md mb-4">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-lg">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-semibold mb-2">Name:</label>
        <input type="text" name="name" value="{{ $user->name }}" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div class="mb-4">
        <label for="email" class="block text-gray-700 font-semibold mb-2">Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div class="mb-4">
        <label for="password" class="block text-gray-700 font-semibold mb-2">New Password (optional):</label>
        <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div class="mb-4">
        <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirm Password:</label>
        <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div class="mb-4">
        <label for="profile_photo" class="block text-gray-700 font-semibold mb-2">Profile Photo (optional):</label>
        <input type="file" name="profile_photo" accept="image/*" class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
        Update Profile
    </button>
</form>
