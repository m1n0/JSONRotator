# JSONRotator
JSON transpose and compression playground for training and educational purposes

Testing how transposing array impacts the size of response and processing time:

```
Running with 10 records:
--- Encoding to JSON as-is: ---
Time elapsed: 2.598762512207E-5 s
JSON size: 649 B
JSON gzipped size: 207 B


--- Encoding to JSON transposed: ---
Time elapsed: 4.5061111450195E-5 s
JSON size: 392 B
JSON gzipped size: 185 B

Previous run comparison:
Time: 1.7339449541284
Size: 0.6040061633282
Gzipped size: 0.89371980676328


Recursive transpose (keys are not preserved, comparing to no-transpose run):
--- Encoding to JSON transposed: ---
Time elapsed: 4.4822692871094E-5 s
JSON size: 365 B
JSON gzipped size: 187 B

Previous run comparison:
Time: 1.7247706422018
Size: 0.56240369799692
Gzipped size: 0.90338164251208


Running with 1000 records:
--- Encoding to JSON as-is: ---
Time elapsed: 0.00086808204650879 s
JSON size: 65056 B
JSON gzipped size: 9274 B


--- Encoding to JSON transposed: ---
Time elapsed: 0.0017111301422119 s
JSON size: 36089 B
JSON gzipped size: 7830 B

Previous run comparison:
Time: 1.9711617687449
Size: 0.55473745696016
Gzipped size: 0.84429588095752


Recursive transpose (keys are not preserved, comparing to no-transpose run):
--- Encoding to JSON transposed: ---
Time elapsed: 0.0015218257904053 s
JSON size: 36062 B
JSON gzipped size: 7801 B

Previous run comparison:
Time: 1.7530898104916
Size: 0.55432242990654
Gzipped size: 0.84116885917619
```
