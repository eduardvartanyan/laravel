<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
        .message-form {
            max-width: 500px;
            margin: 0 20px;
        }
        .message-form > div {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .message-form_input {
            width: 70%;
        }
        .message-form textarea {
            height: 150px;
        }
    </style>
</head>
<body>
    <form action="/texts" class="message-form" method="post">
        @csrf
        <h2>Сообщение # {{$message->id}}</h2>
        <div>
            <label for="author">Автор:</label>
            <input type="text" id="author" name="author" class="message-form_input" value="{{$message->author}}">
            <input type="text" name="id" value="{{$message->id}}" style="display: none">
        </div>
        <div>
            <label for="title">Заголовок:</label>
            <input type="text" id="title" name="title" class="message-form_input" value="{{$message->title}}">
        </div>
        <div>
            <label for="text">Текст:</label>
            <textarea id="text" name="text" class="message-form_input">{{$message->text}}</textarea>
        </div>
        <div>
            <label>Дата публикации:</label>
            <input type="text" name="published" class="message-form_input" value="{{$message->published}}" disabled>
        </div>
        <div>
            <input type="submit" value="Сохранить">
        </div>
    </form>
</body>
</html>
