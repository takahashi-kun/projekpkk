    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="logoutModalLabel">Ready to Leave?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <form action="../service/logout.php" method="post">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" name="logout" class="btn btn-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
  </div>
</footer>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.0/js/dataTables.jqueryui.js"></script>
<script src="https://cdn.datatables.net/2.3.0/js/dataTables.bootstrap5.js"></script>

<script src="../templates/vendors/js/vendor.bundle.base.js"></script>
<script src="../templates/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

<script src="../templates/vendors/chart.js/Chart.min.js"></script>
<script src="../templates/vendors/progressbar.js/progressbar.min.js"></script>

<script src="../templates/js/off-canvas.js"></script>
<script src="../templates/js/hoverable-collapse.js"></script>
<script src="../templates/js/template.js"></script>
<script src="../templates/js/settings.js"></script>
<script src="../templates/js/todolist.js"></script>

<script src="../templates/js/jquery.cookie.js" type="text/javascript"></script>
<script src="../templates/js/dashboard.js"></script>
<script src="../templates/js/Chart.roundedBarCharts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



<script>
  new DataTable('#tabelsearch', {
  scrollX: true,
  layout: {
    topStart: null,
    topEnd: null,
    top: {
      search: {
        className: 'dt-custom-search-end'
      },
      pageLength: {
        menu: [5, 10, 25, 50, 100]
      }
    }
  },
  search: {
    return: true
  }
});

</script>

</body>

</html>