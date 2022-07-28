<!DOCTYPE html>
<html>
<head>
    <title>Телеграф</title>
    <style>
        .message-form {
            max-width: 500px;
        }
        .message-form > div {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .message-form_input {
            width: 80%;
        }
        .message-form textarea {
            height: 150px;
        }
        .message-table {
            max-width: 1000px;
            border-collapse: collapse;
        }
        .message-table td {
            padding: 5px 10px;
        }
        .message-table textarea {
            height: 100px;
            width: 400px;
        }
        .sendform-status {
            max-width: 450px;
            margin: 0 20px;
            padding: 30px;
            color:white;
        }
        .success {
            background-color: limegreen;
            font-weight: bold;
        }
        .error {
            background-color: hotpink;
            font-weight: bold;
        }
    </style>
</head>

<body>
<h1>Телеграф</h1>
<h2>Ранее отправленные сообщения</h2>
<table class="message-table">
    <thead>
    <td>Id</td>
    <td>Заголовок</td>
    <td>Текст</td>
    <td>Автор</td>
    <td>Дата отправки</td>
    <td>Действия</td>
    </thead>
@foreach($messages as $message)
    <tr>
        <form action="/texts" method="post">
            <td>
                <input type="text" name="id" value="{{$message->id}}" style="display: none">
                <a href="/texts/{{$message->id}}">{{$message->id}}</a>
            </td>
            <td>
                <input type="text" name="id" value="{{$message->id}}" style="display: none">
                <input type="text" name="title" value="{{$message->title}}">
            </td>
            <td><textarea name="text">{{$message->text}}</textarea></td>
            <td><input type="text" name="author" value="{{$message->author}}"></td>
            <td><input type="text" name="published" value="{{$message->published}}" disabled></td>
            <td>
                <input type="submit" name="edit" value="Изменить"><br><br>
                <input type="submit" name="delete" value="Удалить">
            </td>
        </form>
    </tr>
@endforeach
</table>

<form action="/texts" class="message-form" method="post">
    @csrf
    <h2>Отправить новое сообщение</h2>
    <div>
        <label for="author">Автор:</label>
        <input type="text" id="author" name="author" class="message-form_input">
    </div>
    <div>
        <label for="title">Заголовок:</label>
        <input type="text" id="title" name="title" class="message-form_input">
    </div>
    <div>
        <label for="text">Текст:</label>
        <textarea id="text" name="text" class="message-form_input"></textarea>
    </div>
    <div>
        <input type="reset" value="Очистить форму">
        <input type="submit" value="Отправить">
    </div>
</form>
</body>
</html>
