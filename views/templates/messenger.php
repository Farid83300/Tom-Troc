<!-- Page de messagerie du site Tom Troc -->
<?php $currentPage = 'messenger'; ?>

<section class="messenger <?= $withUser ? 'messenger--conversation' : '' ?>">

    <!-- Colonne gauche : liste des conversations -->
    <aside class="messenger__sidebar">
        <h1 class="messenger__title">Messagerie</h1>

        <?php if (empty($conversations)) : ?>
            <p class="messenger__empty">Aucune conversation pour le moment.</p>
        <?php else : ?>
            <ul class="messenger__list">
                <?php foreach ($conversations as $conv) : ?>
                    <li class="messenger__item <?= ($withUser && $withUser['id'] === $conv['id']) ? 'messenger__item--active' : '' ?>">
                        <a href="index.php?action=messenger&with=<?= (int) $conv['id'] ?>">
                            <img 
                                src="<?= htmlspecialchars($conv['profile_picture'] ?? 'assets/img/avatar/defaut-avatar.png') ?>" 
                                alt="Avatar de <?= htmlspecialchars($conv['pseudo']) ?>"
                                class="messenger__avatar"
                            >
                            <div class="messenger__info">
                                <span class="messenger__username">
                                    <?= htmlspecialchars($conv['pseudo']) ?>
                                </span>
                                <span class="messenger__preview">
                                    <?= htmlspecialchars(mb_substr($conv['last_message'] ?? '', 0, 40)) ?>...
                                </span>
                            </div>
                            <?php if ($conv['unread_count'] > 0) : ?>
                                <span class="messenger__badge"><?= (int) $conv['unread_count'] ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </aside>

    <!-- Colonne droite : conversation active -->
    <div class="messenger__chat">
        <?php if (!$withUser) : ?>

            <!-- Aucune conversation sélectionnée -->
            <div class="messenger__placeholder">
                <p>Sélectionnez une conversation pour lire vos messages.</p>
            </div>

        <?php else : ?>
            <!-- Bouton retour — visible uniquement sur mobile -->
            <a href="index.php?action=messenger" class="messenger__back">retour</a>
            <!-- En-tête de la conversation -->
            <header class="messenger__chat-header">
                <img 
                    src="<?= htmlspecialchars($withUser['profile_picture'] ?? 'assets/img/avatar/defaut-avatar.png') ?>" 
                    alt="Avatar de <?= htmlspecialchars($withUser['pseudo']) ?>"
                    class="messenger__chat-avatar"
                >
                <h3 class="messenger__chat-name">
                    <?= htmlspecialchars($withUser['pseudo']) ?>
                </h3>
            </header>

            <!-- Zone des messages -->
            <div class="messenger__messages" id="messages-container">
                <?php if (empty($messages)) : ?>
                    <p class="messenger__no-message">Aucun message pour le moment.</p>
                <?php else : ?>
                    <?php foreach ($messages as $msg) : ?>
                        <?php $isSent = ((int)$msg['sender_id'] === (int)$currentUserId); ?>

                        <div class="messenger__bubble <?= $isSent ? 'messenger__bubble--sent' : 'messenger__bubble--received' ?>">
                            
                            <?php if (!$isSent) : ?>
                                <div class="messenger__bubble-meta">
                                    <img 
                                        src="<?= htmlspecialchars($msg['sender_avatar'] ?? 'assets/img/avatar/defaut-avatar.png') ?>" 
                                        alt="Avatar"
                                    >
                                    <time class="messenger__bubble-time" datetime="<?= date('Y-m-d\TH:i', strtotime($msg['created_at'])) ?>">
                                        <?= date('d/m/Y H:i', strtotime($msg['created_at'])) ?>
                                    </time>
                                </div>
                            <?php else : ?>
                                <time class="messenger__bubble-time" datetime="<?= date('Y-m-d\TH:i', strtotime($msg['created_at'])) ?>">
                                    <?= date('d/m/Y H:i', strtotime($msg['created_at'])) ?>
                                </time>
                            <?php endif; ?>

                            <p class="messenger__bubble-content">
                                <?= htmlspecialchars($msg['content']) ?>
                            </p>

                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Formulaire d'envoi -->
            <div class="messenger__form-wrapper">
                <form 
                    action="index.php?action=send-message" 
                    method="POST" 
                    class="messenger__form"
                >
                    <input 
                        type="hidden" 
                        name="receiver_id" 
                        value="<?= (int) $withUser['id'] ?>"
                    >
                    <textarea 
                        name="content" 
                        placeholder="Tapez votre message ici" 
                        class="messenger__input"
                        required
                    ></textarea>
                    <button type="submit" class="messenger__send-btn">
                        Envoyer
                    </button>
                </form>
            </div>

        <?php endif; ?>
    </div>

</section>