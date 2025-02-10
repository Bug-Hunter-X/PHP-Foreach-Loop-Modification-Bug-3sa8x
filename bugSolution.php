function foo(array $arr) {
  $keysToRemove = [];
  foreach ($arr as $key => $value) {
    if ($value === 'bar') {
      $keysToRemove[] = $key;
    }
  }
  foreach ($keysToRemove as $key) {
    unset($arr[$key]);
  }
  return $arr;
}

function foo2(array &$arr) {
  $arr = array_filter($arr, function ($value) { return $value !== 'bar';});
}

$arr = ['foo', 'bar', 'baz'];
$result = foo($arr);
print_r($result); // Output: Array ( [0] => foo [2] => baz )

$arr2 = ['foo', 'bar', 'baz'];
foo2($arr2);
print_r($arr2); // Output: Array ( [0] => foo [2] => baz )