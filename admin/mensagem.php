<?php if(isset($_SESSION['mensagem'])): ?>
                <div class="alert alert-success mt-2">
                        <?= $_SESSION['mensagem'];
                        unset($_SESSION['mensagem']);
                        ?>
                </div>
                    <?php endif; ?>

                    <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                        <?= $_SESSION['error']; 
                        unset($_SESSION['error']);
                        ?>
                </div>
                    <?php endif; ?>
                    <!-- // código do kesse -->