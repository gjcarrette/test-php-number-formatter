<?php

function test0() {
 if (function_exists('posix_uname')) {
  $u = posix_uname();
  unset($u['nodename']);
  unset($u['domainname']);
  echo json_encode($u, JSON_PRETTY_PRINT) . "\n";
 }
 $x = new \ReflectionExtension('intl');
 $x->info();
 echo "\n";
}

function test1($l = 'fr_CA', $m = 92345.67, $cur = 'USD') {
 echo "Locale::setDefault($l) = " . var_export(\Locale::setDefault($l), true) . "\n";
 echo "Locale::getDefault() = " . \Locale::getDefault() . "\n";
 $fmt = \NumberFormatter::create($l, \NumberFormatter::CURRENCY);
 echo "CURRENCY_SYMBOL = " . var_export($fmt->getSymbol(\NumberFormatter::CURRENCY_SYMBOL), true) . "\n";
 echo "INT_CURRENCY_SYMBOL = " . var_export($fmt->getSymbol(\NumberFormatter::INTL_CURRENCY_SYMBOL), true) . "\n";
 echo "CURRENCY_CODE = " . var_export($fmt->getTextAttribute(NumberFormatter::CURRENCY_CODE), true) . "\n";
 $r = $fmt->formatCurrency($m, $cur);
 $h = bin2hex($r);
 echo "formatCurrency($m, $cur) = " . var_export($r, true) . " [$h]\n\n";
}

test0();
// See also https://en.wikipedia.org/wiki/Dollar
// https://en.wikipedia.org/wiki/Pound_(currency)
test1('fr_CA', 92345.67, 'USD');
test1('fr_CA', 92345.67, 'AUD');
test1('fr_CA', 92345.67, 'CAD');
test1('fr_CA', 92345.67, 'EUR');
test1('fr_CA', 92345.67, 'GBP');
// Do not know for sure if these currency names are valid in this context.
//test1('fr_CA', 92345.67, 'EGP');
//test1('fr_CA', 92345.67, 'GIP');
