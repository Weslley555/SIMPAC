<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aluno</title>
</head>
<body>
    <h1>Adicionar Aluno</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>
        <br>

        <label for="matriculation">Matrícula:</label>
        <input type="text" id="matriculation" name="matriculation" required>
        <br>

        <button type="submit">Adicionar</button>
    </form>
</body>
</html>
