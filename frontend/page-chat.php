<?php
get_header("Chat");
?>

<section class="chat-area py-5">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="col-md-4">
                <h2 class="h3 mb-1">Chat</h2>
                <ul class="chat-user-list">
                    <li>
                        <a href="#" class="chat-item chat-link">
                            <div class="user-avatar">
                                <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                                <span class="status active">

                                </span>
                            </div>
                            <div class="chat-info">
                                <span class="user-name">Prabhat Gurung</span>
                                <span class="chat-last-msg">Lorem, ipsum dolor.</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="chat-item chat-link">
                            <div class="user-avatar">
                                <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                                <span class="status active">

                                </span>
                            </div>
                            <div class="chat-info">
                                <span class="user-name">Prabhat Gurung</span>
                                <span class="chat-last-msg">Lorem, ipsum dolor.</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="chat-item chat-link">
                            <div class="user-avatar">
                                <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                                <span class="status active">

                                </span>
                            </div>
                            <div class="chat-info">
                                <span class="user-name">Prabhat Gurung</span>
                                <span class="chat-last-msg">Lorem, ipsum dolor.</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="chat-container">
                    <div class="chat-header">
                        <div class="chat-item">
                            <div class="user-avatar">
                                <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                                <span class="status active">

                                </span>
                            </div>
                            <div class="chat-info">
                                <span class="user-name">Prabhat Gurung</span>
                                <span class="chat-last-msg">Lorem, ipsum dolor.</span>
                            </div>
                        </div>
                    </div>
                    <div class="chat-body">
                        <div class="chat-conversation">
                            <div class="conv-item">
                                
                            </div>
                        </div>
                    </div>
                    <div class="chat-footer">
                        <form action="#" method="post" class="chat-form">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();
