<?php

function test0() {
 $x = new \ReflectionExtension('intl');
 $x->info();
 echo "\n";
}

function test1($l = 'fr_CA', $m = 92345.67) {
 echo "Locale::setDefault($l) = " . var_export(\Locale::setDefault($l), true) . "\n";
 echo "Locale::getDefault() = " . \Locale::getDefault() . "\n";
 $fmt = \NumberFormatter::create($l, \NumberFormatter::CURRENCY);
 echo "CURRENCY_SYMBOL = " . var_export($fmt->getSymbol(\NumberFormatter::CURRENCY_SYMBOL), true) . "\n";
 echo "INT_CURRENCY_SYMBOL = " . var_export($fmt->getSymbol(\NumberFormatter::INTL_CURRENCY_SYMBOL), true) . "\n";
 echo "CURRENCY_CODE = " . var_export($fmt->getTextAttribute(NumberFormatter::CURRENCY_CODE), true) . "\n";
 $r = $fmt->format($m);
 $h = bin2hex($r);
 echo "format($m) = " . var_export($r, true) . " [$h]\n\n";
}

test0();
test1('fr_CA');
test1('en_CA');
test1('fr_US');
test1('en_US');
