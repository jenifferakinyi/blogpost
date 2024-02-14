<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
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
        .search {
            margin-bottom: 20px;
        }
        .search input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .search button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .search button:hover {
            background-color: #45a049;
        }
        .post-container {
            margin-bottom: 20px;
        }
        .post {
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .title,
        .content {
            flex-grow: 1;
            padding: 5px;
        }
        .title {
            font-weight: bold;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .edit-button,
        .delete-button {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .edit-button {
            background-color: #007bff;
            color: white;
        }
        .delete-button {
            background-color: #dc3545;
            color: white;
        }
        .edit-button:hover,
        .delete-button:hover {
            filter: brightness(90%);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>List of Posts</h1>

        <!-- Add New Post Button -->
        <div class="search">
            <input type="text" placeholder="Search...">
            <button>Search</button>
        </div>

        <!-- Search bar -->
        <div class="add-post">
            <a href="{{ route('posts.create') }}">Add New Post</a>
        </div>


        <!-- List of Posts -->
        @if($posts->isEmpty())
            <div class="post-container">
                <div class="post">
                    <h1>No tasks found</h1>
                </div>
            </div>
        @else
            @foreach($posts as $post)
                <div class="post-container">
                    <div class="post">
                        <div class="title">{{ $post->title }}</div>
                        <div class="content">{{ $post->content }}</div>
                        <div class="action-buttons">
                            <a href="{{ route('posts.update', $post->id) }}" class="edit-button">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>
