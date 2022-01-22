<?php


namespace App\Twig;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ArticleExtension extends AbstractExtension
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('articles', [$this, 'getArticles'])
        ];
    }

    public function getArticles()
    {
        return $this->em->getRepository(Article::class)->findAll();
    }
}