<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>
    <h1>Testing Laravel</h1>
    <ul>
        @forelse ($projects as $project)
            <li>
                <a href="{{ '/projects/' . $project->id }}">
                    {{ $project->title }}
                </a>
            </li>

        @empty
            <li>No projects yet.</li>
        @endforelse
    </ul>

</body>
</html>
