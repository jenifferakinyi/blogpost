<!DOCTYPE html>
<html>
<head>
    <title>Create New Post</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .text-danger {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <a href="{{ route('posts.index') }}"><button>Back</button></a>
    <div class="container">
        <h1>Create New Post</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title">
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="content">Content:</label>
                <textarea id="content" name="content"></textarea>
                @error('content')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Add a user dropdown to select the user who created the post --}}
            <div class="mb-4">
                <label for="user_id">User:</label>
                <select name="user_id" id="user_id" class="form-select mt-1 block w-full">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
