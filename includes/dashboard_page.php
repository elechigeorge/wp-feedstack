<?php

function feedstack_plugin_settings_page() {
  ?>
  <div class="">
        
        <div class="jumbotron">
            <h1 class="fs-4 fw-bold mb-0">FeedStack</h1>
            <p class="lead">Meet users expectation with great feedbacks!</p>
            <hr class="my-4">
        
        </div>
  
      <h1 class="lead"><?php _e( 'Submissions', 'settings' ); ?></h1>
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Rating</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody id="submissionTable">
                        <!-- Table rows will be populated here -->
                    </tbody>
                </table>
              </div>
  </div>
  <?php
  
}

