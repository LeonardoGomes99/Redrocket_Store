@props(['message'])
<div
x-ref="loading"
class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50"
style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
>
    {{$message}}
</div>
