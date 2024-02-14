@if (Route::has('posts.index'))
    <a href="{{ route('posts.index') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">BLOGS</a>
@endif

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
    </style>
</head>
<body>
    <div class="container">
        <h1>List of Blogs</h1>

        <!-- List of Posts -->
        @if($posts->isEmpty())
            <div class="post-container">
                <div class="post">
                    <h1>No blogs found</h1>
                </div>
            </div>
        @else
            @foreach($posts as $post)
                <div class="post-container">
                    <div class="post">
                        <div class="title">{{ $post->title }}</div>
                        <div class="content">{{ $post->content }}</div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>
