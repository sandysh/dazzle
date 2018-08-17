
<form method="POST" action={{route('student.store')}}>
	@csrf
	<label>Name</label><input type="text" name="name">
	<label>Email</label><input type="email" name="email">
	<label>Contact</label><input type="text" name="contact">
	<input type="submit" name="submit" value="submit">
</form>