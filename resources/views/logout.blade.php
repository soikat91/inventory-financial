<iframe src="http://localhost:8080/logout" style="display:none;"></iframe>
<script>
    setTimeout(() => {
        window.location.href = "{{ route('login') }}";
    }, 1000);
</script>
