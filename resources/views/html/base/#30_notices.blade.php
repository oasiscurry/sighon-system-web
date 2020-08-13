@section('notices')
  <div class="modal fade" id="notices" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Notices</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3>Notices for files:</h3>
            <ul>
              <li>jquery-3.4.1.min.js</li>
            </ul>
            <pre id="jquery-3.4.1.min.js.id" class="notices-pre bg-light p-4"></pre>

            <h3>Notices for files:</h3>
            <ul>
              <li>bootstrap.bundle.min.js</li>
              <li>bootstrap.min.css</li>
            </ul>
            <pre id="bootstrap.bundle.min.js.id" class="notices-pre bg-light p-4"></pre>

            <h3>Notices for files:</h3>
            <ul>
              <li>three.min.js</li>
              <li>OrbitControls.js</li>
              <li>GLTFLoader.js</li>
              <li>DRACOLoader.js</li>
            </ul>
            <pre id="three.min.js.id" class="notices-pre bg-light p-4"></pre>

            <h3>Notices for files:</h3>
            <ul>
              <li>draco_decoder.js</li>
            </ul>
            <pre id="draco_decoder.js.id" class="notices-pre bg-light p-4"></pre>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
        </div>
      </div>
    </div>
  </div>
@endsection
