<?php

use PHPUnit\Framework\TestCase;

class StringsTest extends TestCase
{
    /**
     * @see https://www.php.net/manual/en/language.types.string.php
     */
    public function testVariableParsing()
    {
        $foo = 'world';

        // Double quotes.
        $this->assertEquals('Hello world', "Hello $foo");

        // Single quotes.
        $this->assertEquals('Hello $foo', 'Hello $foo');

        // TODO "Hello ${foo}"
        $this->assertEquals('Hello world', "Hello ${foo}");

        // TODO "Hello " . $foo
        $this->assertEquals('Hello world', "Hello " . $foo);

        // TODO Heredoc
        $heredoc = <<<EOD
Hello $foo
EOD;
        $this->assertEquals('Hello world', $heredoc);

        // TODO Nowdoc
        $nowdoc = <<<'EOT'
Hello $foo
EOT;
        $this->assertEquals('Hello $foo', $nowdoc);
    }

    /**
     * @see https://www.php.net/manual/en/ref.strings.php
     */
    public function testStringFunctions()
    {
        // trim — Strip whitespace (or other characters) from the beginning and end of a string
        $this->assertEquals('Hello', trim('Hello         '));
        $this->assertEquals('Hello', trim('Hello......', '.'));

        // ltrim — Strip whitespace (or other characters) from the beginning of a string
        // TODO to be implemented
        $this->assertEquals('Hello   ', ltrim('   Hello   '));

        // rtrim — Strip whitespace (or other characters) from the end of a string
        // TODO to be implemented
        $this->assertEquals('   Hello', rtrim('   Hello   '));

        // strtoupper — Make a string uppercase
        $this->assertEquals('HELLO', strtoupper('hello'));

        // strtolower — Make a string lowercase
        $this->assertEquals('hello', strtolower('HeLlO'));

        // ucfirst — Make a string's first character uppercase
        // TODO to be implemented
        $this->assertEquals('Hello world', ucfirst('hello world'));

        // lcfirst — Make a string's first character lowercase
        // TODO to be implemented
        $this->assertEquals('hello world', lcfirst('Hello world'));

        // strip_tags — Strip HTML and PHP tags from a string
        // TODO to be implemented
        $this->assertEquals('Test paragraph. Other text', strip_tags('<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a>'));
        $this->assertEquals('<p>Test paragraph.</p> <a href="#fragment">Other text</a>', strip_tags('<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a>', '<p><a>'));

        // htmlspecialchars — Convert special characters to HTML entities
        // TODO to be implemented
        $this->assertEquals("&lt;a href='test'&gt;Test&lt;/a&gt;", htmlspecialchars("<a href='test'>Test</a>"));

        // addslashes — Quote string with slashes
        // TODO to be implemented
        $this->assertEquals("Is your name O\'Reilly?", addslashes("Is your name O'Reilly?"));     

        // strcmp — Binary safe string comparison
        // TODO to be implemented
        $this->assertEquals(-1, strcmp('abc', 'cab'));    

        // strncasecmp — Binary safe case-insensitive string comparison of the first n characters
        // TODO to be implemented
        $this->assertEquals(0, strncasecmp('abcd', 'abca', 3));

        // str_replace — Replace all occurrences of the search string with the replacement string
        // TODO to be implemented
        $this->assertEquals('Hello world!', str_replace('_', '!', 'Hello world_'));

        // strpos — Find the position of the first occurrence of a substring in a string
        // TODO to be implemented
        $this->assertEquals(5, strpos('Hello world', ' '));

        // strstr — Find the first occurrence of a string
        // TODO to be implemented
        $this->assertEquals('@example.com', strstr('name@example.com', '@'));

        // strrchr — Find the last occurrence of a character in a string
        // TODO to be implemented
        $this->assertEquals('/index.html', strrchr('/www/public_html/index.html', '/'));

        // substr — Return part of a string
        // TODO to be implemented
        $this->assertEquals('index.html', substr('/index.html', 1));

        // sprintf — Return a formatted string
        // TODO to be implemented
        $this->assertEquals('2021-03-23', sprintf("%04d-%02d-%02d", '2021', '03', '23'));
    }
}