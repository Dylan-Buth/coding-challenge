<?php

$text = "Snippet 1:

<table><tr><td>432987</td></tr></table>

Snippet 2:

<div>164-PE 09983 PO#432987</div>

Snippet 3:

Order 432987-IRC

Snippet 4:

432987";

$orderNumbers = [];
preg_match_all('/[0-9]{6,}/', $text, $orderNumbers);