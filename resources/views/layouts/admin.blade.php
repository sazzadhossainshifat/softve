<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0f172a;
            color: #f1f5f9;
        }

        .sidebar {
            background-color: #1e293b;
            min-height: 100vh;
            width: 240px;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            box-shadow: 2px 0 10px rgba(0,0,0,0.2);
        }

        .sidebar h4 {
            color: #e2e8f0;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            color: #cbd5e1;
            padding: 12px 24px;
            display: flex;
            align-items: center;
            font-size: 15px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #334155;
            color: white;
        }

        .sidebar i {
            margin-right: 10px;
            font-size: 16px;
        }

        .main-content {
            margin-left: 240px;
            padding: 30px;
            min-height: 100vh;
            background-color: #0f172a;
        }

        h1 {
            font-weight: 600;
        }


        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                z-index: 1000;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding: 15px;
            }
        }



    </style>
</head>
<body>

<div class="sidebar">
    <h4><i class="fa-solid fa-graduation-cap"></i> Admin Panel</h4>
    <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">
        <i class="fa-solid fa-gauge"></i> Dashboard
    </a>
    <a href="{{ route('categories.index') }}" class="{{ request()->is('categories*') ? 'active' : '' }}">
        <i class="fa-solid fa-layer-group"></i> Categories
    </a>
    <a href="{{ route('courses.create') }}" class="{{ request()->is('courses/create') ? 'active' : '' }}">
        <i class="fa-solid fa-plus"></i> Create Course
    </a>
    <a href="{{ route('courses.index') }}" class="{{ request()->is('courses') ? 'active' : '' }}">
        <i class="fa-solid fa-list"></i> Course List
    </a>
</div>

<div class="main-content">
    @yield('content')
</div>


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $('textarea[name="description"]').summernote({
            height: 150,
            placeholder: 'Course Description...'
        });
    });
</script>

@stack('scripts')



</body>
</html>
