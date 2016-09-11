<?php

require_once 'vendor/autoload.php';

// Die State Machine wird geladen
$stateMachine = new MP\StateMachine();

// Alle verfügbaren Status werden laden
$stateOrdered     = new MP\State\Ordered();
$statePrinted     = new MP\State\Printed();
$stateSliced      = new MP\State\Sliced();
$stateFramed      = new MP\State\Framed();
$stateGiftWrapped = new MP\State\GiftWrapped();
$stateShipped     = new MP\State\Shipped();

// 1.1 Gerahmtes Poster ohne Geschenkverpackung ohne Fehler
$framedPoster = new MP\Article(MP\Article::TYPE_POSTER_FRAMED);
$stateMachine->confirmState($stateOrdered, $framedPoster);
$stateMachine->confirmState($statePrinted, $framedPoster);
$stateMachine->confirmState($stateSliced, $framedPoster);
$stateMachine->confirmState($stateFramed, $framedPoster);
$stateMachine->confirmState($stateShipped, $framedPoster);

// 1.2 Gerahmtes Poster ohne Geschenkverpackung mit Fehler
$framedPoster = new MP\Article(MP\Article::TYPE_POSTER_FRAMED);
$stateMachine->confirmState($stateOrdered, $framedPoster);
$stateMachine->confirmState($stateSliced, $framedPoster); // Fehler
$stateMachine->confirmState($statePrinted, $framedPoster);
$stateMachine->confirmState($stateSliced, $framedPoster);
$stateMachine->confirmState($stateFramed, $framedPoster);
$stateMachine->confirmState($stateShipped, $framedPoster);

// 1.3 Gerahmtes Poster mit Geschenkverpackung
$framedPosterWithGiftWrapping = new MP\Article(MP\Article::TYPE_POSTER_FRAMED);
$framedPosterWithGiftWrapping->enableGiftWrapping();
$stateMachine->confirmState($stateOrdered, $framedPosterWithGiftWrapping);
$stateMachine->confirmState($statePrinted, $framedPosterWithGiftWrapping);
$stateMachine->confirmState($stateSliced, $framedPosterWithGiftWrapping);
$stateMachine->confirmState($stateFramed, $framedPosterWithGiftWrapping);
$stateMachine->confirmState($stateGiftWrapped, $framedPosterWithGiftWrapping);
$stateMachine->confirmState($stateShipped, $framedPosterWithGiftWrapping);

// 2.1 Bedrucktes Glas ohne Geschenkverpackung
$printedGlass = new MP\Article(MP\Article::TYPE_PRINTED_GLASS);
$stateMachine->confirmState($stateOrdered, $printedGlass);
$stateMachine->confirmState($statePrinted, $printedGlass);
$stateMachine->confirmState($stateShipped, $printedGlass);

// 2.2 Bedrucktes Glas mit Geschenkverpackung ohne Fehler
$printedGlassWithGiftWrapping = new MP\Article(MP\Article::TYPE_PRINTED_GLASS);
$printedGlassWithGiftWrapping->enableGiftWrapping();
$stateMachine->confirmState($stateOrdered, $printedGlassWithGiftWrapping);
$stateMachine->confirmState($statePrinted, $printedGlassWithGiftWrapping);
$stateMachine->confirmState($stateGiftWrapped, $printedGlassWithGiftWrapping);
$stateMachine->confirmState($stateShipped, $printedGlassWithGiftWrapping);

// 2.3 Bedrucktes Glas mit Geschenkverpackung mit Fehler
$printedGlassWithGiftWrapping = new MP\Article(MP\Article::TYPE_PRINTED_GLASS);
$printedGlassWithGiftWrapping->enableGiftWrapping();
$stateMachine->confirmState($stateOrdered, $printedGlassWithGiftWrapping);
$stateMachine->confirmState($statePrinted, $printedGlassWithGiftWrapping);
$stateMachine->confirmState($stateShipped, $printedGlassWithGiftWrapping); // Fehler
$stateMachine->confirmState($stateGiftWrapped, $printedGlassWithGiftWrapping);
$stateMachine->confirmState($stateShipped, $printedGlassWithGiftWrapping);
