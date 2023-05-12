<?php
get_header("Chat");
?>

<section class="chat-area py-3">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="col-2 col-lg-3">
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
            <div class="col-10 col-lg-9 divider">
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
                                <div class="user-avatar">
                                    <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                                </div>
                                <div class="conv-message">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque autem rem minus quidem id. Distinctio doloremque incidunt dolor necessitatibus dolorum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam in eum maiores! Similique, quod vel.</p>
                                </div>
                            </div>
                            <div class="conv-item">
                                <div class="user-avatar">
                                    <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                                </div>
                                <div class="conv-message">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque autem rem minus quidem id. Distinctio doloremque incidunt dolor necessitatibus dolorum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam in eum maiores! Similique, quod vel.</p>
                                </div>
                            </div>
                            <div class="conv-item my-side">
                                <div class="conv-message">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque autem rem minus quidem id. Distinctio doloremque incidunt dolor necessitatibus dolorum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam in eum maiores! Similique, quod vel.</p>
                                </div>
                            </div>
                            <div class="conv-item my-side">
                                <div class="conv-message">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque autem rem minus quidem id. Distinctio doloremque incidunt dolor necessitatibus dolorum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam in eum maiores! Similique, quod vel.</p>
                                </div>
                            </div>
                            <div class="conv-item">
                                <div class="user-avatar">
                                    <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                                </div>
                                <div class="conv-message">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque autem rem minus quidem id. Distinctio doloremque incidunt dolor necessitatibus dolorum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam in eum maiores! Similique, quod vel.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-footer">
                        <form action="#" method="post" class="chat-form">
                            <textarea name="chatMessageField" id="chatMessageField" class="form-control"></textarea>
                            <button type="submit" class="btn btn-dark">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();
