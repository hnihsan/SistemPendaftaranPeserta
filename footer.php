  <script src="resources/js/jquery.js"></script>
  <script src="resources/semantic/semantic.min.js"></script>
  <script type="text/javascript" charset="utf8" src="resources/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="resources/js/dataTables.semanticui.min.js"></script>
  <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <script type="text/javascript">
  $(document).ready( function () {
    $('#table1').DataTable({
      language: {
        url: 'resources/Indonesian.json'
      }
    });
    $('.ui.dropdown').dropdown();
    $('#tambah').modal('attach events', '.tambah.button', 'show');
    $('#ubah').modal('attach events', '.ubah.button', 'show');
  } );
  </script>
</body>
</html>
