<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
        }
        .timestamp {
            color: #999;
            font-size: 0.8rem;
        }
        .button-container {
            margin-top: 20px;
        }
        .button-container button {
            padding: 10px 20px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .button-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <a href="{{ route('posts.index') }}"><button>Back</button></a>
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <p class="timestamp">Posted on: {{ $post->created_at->format('M d, Y') }}</p>

        <div class="button-container">
            <a href="{{ route('posts.edit', $post->id) }}"><button>Edit</button></a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>

    </div>
</body>
</html>
