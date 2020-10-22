<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All projects</title>
</head>
<body>
    <h1>Here are all of my projects</h1>
    <p> {{ $projectsList }}</p>
    
    @foreach ( $projectsList as $project)
        <p>PROJECT -> {{ $project->title}}</p>
    @endforeach
</body>
</html>