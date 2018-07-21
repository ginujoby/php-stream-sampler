# Stream Sampler
Stream sampler that receives and processes an input stream consisting of single characters. The program takes a sample size as a parameter and generate a random representative sample using that many characters.

Installing Dependencies:
```
$ php composer install
```

Usage:

```
$ cat bin/input.txt | bin/stream-sampler 5
$ bin/stream-sampler 5
```

Test:
```
$ bin/phpunit
```
