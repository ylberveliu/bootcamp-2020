<h1>Working with sessions</h1>
@if(session()->has($key))
    <p>
       {{ ucfirst($key) }}: {{ session()->get($key) }}
    </p>
@else 
    <p>Session doesn't exist!</p>
@endif