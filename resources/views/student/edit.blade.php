<form method="POST" action={{route('student.update',$student->id)}}>
	@method('PUT')
	@csrf
	<label>Name</label><input type="text" name="name" value="{{$student->name}}">
	<label>Email</label><input type="email" name="email" value="{{$student->email}}">
	<label>Contact</label><input type="text" name="contact" value="{{$student->contact}}">
	<input type="submit" name="submit" value="submit">
</form>