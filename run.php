<?php

require_once 'vendor/autoload.php';

$stateMachine = new MP\StateMachine();

$stateOrdered     = new MP\State\Ordered();
$statePrinted     = new MP\State\Printed();
$stateSliced      = new MP\State\Sliced();
$stateFramed      = new MP\State\Framed();
$stateGiftWrapped = new MP\State\GiftWrapped();
$stateShipped     = new MP\State\Shipped();

// 1.1 Framed Poster without gift wrapping without error
$framedPoster = new MP\Article(MP\Article::TYPE_POSTER_FRAMED);
$stateMachine->confirmState($stateOrdered, $framedPoster);
$stateMachine->confirmState($statePrinted, $framedPoster);
$stateMachine->confirmState($stateSliced, $framedPoster);
$stateMachine->confirmState($stateFramed, $framedPoster);
$stateMachine->confirmState($stateShipped, $framedPoster);

// 1.2 Framed Poster without gift wrapping with errors
$framedPoster = new MP\Article(MP\Article::TYPE_POSTER_FRAMED);
$stateMachine->confirmState($stateOrdered, $framedPoster);
$stateMachine->confirmState($stateSliced, $framedPoster); // error
$stateMachine->confirmState($statePrinted, $framedPoster);
$stateMachine->confirmState($stateSliced, $framedPoster);
$stateMachine->confirmState($stateFramed, $framedPoster);
$stateMachine->confirmState($stateShipped, $framedPoster);

// 1.3 Framed Poster with gift packaging
$framedPosterWithGiftWrapping = new MP\Article(MP\Article::TYPE_POSTER_FRAMED);
$framedPosterWithGiftWrapping->enableGiftWrapping();
$stateMachine->confirmState($stateOrdered, $framedPosterWithGiftWrapping);
$stateMachine->confirmState($statePrinted, $framedPosterWithGiftWrapping);
$stateMachine->confirmState($stateSliced, $framedPosterWithGiftWrapping);
$stateMachine->confirmState($stateFramed, $framedPosterWithGiftWrapping);
$stateMachine->confirmState($stateGiftWrapped, $framedPosterWithGiftWrapping);
$stateMachine->confirmState($stateShipped, $framedPosterWithGiftWrapping);

// 2.1 Printed glass without gift wrapping
$printedGlass = new MP\Article(MP\Article::TYPE_PRINTED_GLASS);
$stateMachine->confirmState($stateOrdered, $printedGlass);
$stateMachine->confirmState($statePrinted, $printedGlass);
$stateMachine->confirmState($stateShipped, $printedGlass);

// 2.2 Printed glass with gift packaging without error
$printedGlassWithGiftWrapping = new MP\Article(MP\Article::TYPE_PRINTED_GLASS);
$printedGlassWithGiftWrapping->enableGiftWrapping();
$stateMachine->confirmState($stateOrdered, $printedGlassWithGiftWrapping);
$stateMachine->confirmState($statePrinted, $printedGlassWithGiftWrapping);
$stateMachine->confirmState($stateGiftWrapped, $printedGlassWithGiftWrapping);
$stateMachine->confirmState($stateShipped, $printedGlassWithGiftWrapping);

// 2.3 Printed glass with gift box with error
$printedGlassWithGiftWrapping = new MP\Article(MP\Article::TYPE_PRINTED_GLASS);
$printedGlassWithGiftWrapping->enableGiftWrapping();
$stateMachine->confirmState($stateOrdered, $printedGlassWithGiftWrapping);
$stateMachine->confirmState($statePrinted, $printedGlassWithGiftWrapping);
//$stateMachine->confirmState($stateShipped, $printedGlassWithGiftWrapping); // error
$stateMachine->confirmState($stateGiftWrapped, $printedGlassWithGiftWrapping);
$stateMachine->confirmState($stateShipped, $printedGlassWithGiftWrapping);
