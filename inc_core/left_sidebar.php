            <div class="dashboard-left-menu">
                <ul class="list-unstyled">                    
                    <li <?php if (strpos($_SERVER['SCRIPT_NAME'], '/index.php')!==FALSE){ ?>  class="active" <?php } ?> >
                        <a href="index.php">
                            <!-- <img src="img/icons/User-Transactions.png" class="img-responsive center-block"> -->
                            <i class="fa fa-exchange" aria-hidden="true"></i>
                            <span>User Transactions</span>
                            <span class="notify_alert fa"><img src="img/icons/alart-notifiction.png" alt="alarticon"></span>
                        </a>
                    </li>
<!--                    <li>
                        <a href="#">
                            <i class="fa fa-history" aria-hidden="true"></i>
                            <span>Queues</span>
                        </a>
                    </li>           -->
                    <li>
                        <a href="#">
                            <!-- <img src="img/icons/UBEs.png" class="img-responsive center-block"> -->
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span>UBEs</span>
                        </a>
                    </li>
                    <li <?php if (strpos($_SERVER['SCRIPT_NAME'], '/serverstats.php')!==FALSE){ ?>  class="active" <?php } ?>>
                        <a href="serverstats.php">
                            <!-- <img src="img/icons/Server-States.png" class="img-responsive center-block"> -->
                            <i class="fa fa-server" aria-hidden="true"></i>
                            <span>Server Stats</span>
                        </a>
                    </li>
                    <li <?php if (strpos($_SERVER['SCRIPT_NAME'], '/log-errors.php')!==FALSE){ ?>  class="active" <?php } ?> >
                        <a href="log-errors.php">
                            <!-- <img src="img/icons/Log-Errors.png" class="img-responsive center-block"> -->
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            <span>Log Errors</span>
                        </a>
                    </li> 
                    <li <?php if (strpos($_SERVER['SCRIPT_NAME'], '/database.php')!==FALSE){ ?>  class="active" <?php } ?> >
                        <a href="database.php">
                            <i class="fa fa-database" aria-hidden="true"></i>
                            <span>Database</span>
                        </a>
                    </li>  
                    <li>
                        <a href="#">
                            <i class="fa fa-terminal" aria-hidden="true"></i>
                            <span>Command / Control</span>
                        </a>
                    </li>
                    <li <?php if (strpos($_SERVER['SCRIPT_NAME'], '/alert-setup.php')!==FALSE){ ?>  class="active" <?php } ?> >
                        <a href="alert-setup.php">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>Alert Setup</span>
                        </a>
                    </li>                  
                </ul>
            </div>