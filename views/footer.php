        </div> <!-- column -->
    </div> <!-- columns -->
</div> <!-- container -->

<footer class="footer has-background-primary">
    <div class="content has-text-white has-text-centered">
        <p>
        <strong class="has-text-white">Billet simple pour l'alaska</strong> par <a class="has-text-white" href="http://sihame.alwaysdata.net/blog/index.php">Jean Forteroche</a>.
        </p>
    </div>
</footer>

<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script type="text/javascript">
    $('.navbar-burger').click(function() {
    $('#navbarMenuHeroA, .navbar-burger').toggleClass('is-active');
});
</script>

<script type="text/javascript">
    $(document).on('click', '.notification > button.delete', function() {
        $(this).parent().addClass('is-hidden');
        return false;
    });
</script>

<!-- tinyMCE -->
<script src="https://cdn.tiny.cloud/1/httfvbe0pk0b6bimt4le5y84jgmljyf1etsh9w4hjjkwpbcz
/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: '#billet'
  });
</script>

</body>
</html>
