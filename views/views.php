<?php
declare(strict_types=1);

class View
{
    private string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * Affiche une page dans le template main.php.
     * @param string $template Le nom du fichier template (sans .php)
     * @param array $data Les données à passer à la vue
     */
    public function render(string $template, array $data = []): void
    {
        // On rend les données accessibles dans la vue
        extract($data);

        // On rend le titre accessible dans main.php
        $title = $this->title;

        // On capture le contenu spécifique de la page
        ob_start();
        require __DIR__ . '/templates/' . $template . '.php';
        $content = ob_get_clean();

        // On injecte le tout dans le layout principal
        require __DIR__ . '/templates/main.php';
    }
}