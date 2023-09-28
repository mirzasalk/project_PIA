<link rel="stylesheet" href="/css/courses.css">

<x-layout>
<form method="POST" action="/courses/{{$course->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <h2>Edit: {{$course->title}} </h2>

    <label for="title">Title:</label>
    <input type="text" name="title" placeholder="title" value="{{$course->title}}">
    @error('title')
        <p class="error">{{$message}}</p>
    @enderror

    <br> <br>

    <label for="description">Description:</label>
    <input type="textarea" name="description" placeholder="description" value="{{$course->description}}">
    @error('description')
        <p class="error">{{$message}}</p>
    @enderror

    <br> <br>

    <label for="tags">Tags (Comma seperated):</label>
    <input type="text" name="tags" placeholder="tags" value="{{$course->tags}}">
    @error('tags')
        <p class="error">{{$message}}</p>
    @enderror

    <br> <br>

    <label for="duration">Duration:</label>
    <input type="number" name="duration" placeholder="duration" value="{{$course->duration}}">
    @error('duration')
        <p class="error">{{$message}}</p>
    @enderror

    <br> <br>

    <label for="image">Image:</label>
    <input type="file" name="image" placeholder="image">

    <img class="image"
     src="{{$course->image ? asset('storage/' . $course->image) : asset('/storage/images/no-image.jpg')}}">


    @error('image')
        <p class="error">{{$message}}</p>
    @enderror

    <br> <br>

    <button type="submit">Update</button>

</form>

</x-layout>