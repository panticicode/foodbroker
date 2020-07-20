<footer class="text-center">
	<p class="lead pt-4">Copyright &copy; 2020</p>
</footer>
<script src="{{ asset('js/jquery/jquery.js') }}"></script>
@auth
	<script src="{{ asset('js/push/enable-push.js') }}" defer></script>
@endauth
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery/jquery.dim-background.js') }}"></script>
<script src="{{ asset('js/script.js?v=1.1') }}"></script>
@yield('script')
</body>
</html>