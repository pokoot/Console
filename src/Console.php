<?php

namespace Goldfinger;

use Goldfinger\Command;

/**
 * Prints php messages to the Javascript console.
 *
 * @uses Command
 * @package
 * @version $id$
 * @author Harold Kim
 * @license http://pokoot.com/license.txt
 */
class Console implements Command
{

    /**
     * Array Buffer
     *
     * @var array
     * @access private
     */
    private $buffer = array();

    /**
     * Display the message in the browsers console.
     *
     * @access public
     * @param mixed $content
     * @return int
     */
    public function log($content)
    {
        return array_push($this->buffer, array("action" => "LOG", "content" => $content));
    }


    /**
     * Display an error message to the console.
     *
     * @access public
     * @param mixed $content
     * @return array
     */
    public function error($content)
    {
        return array_push($this->buffer, array("action" => "ERROR", "content" => $content));
    }


    /**
     * Displays a warning message to the console.
     *
     * @access public
     * @param mixed $content
     * @return array
     */
    public function warn($content)
    {
        return array_push($this->buffer, array("action" => "WARN", "content" => $content));
    }


    /**
     * Writes the the number of times that count() has been invoked at the
     * same line and with the same label.
     *
     * @access public
     * @param mixed $content
     * @return int
     */
    public function count($content)
    {
        return array_push($this->buffer, array("action" => "COUNT", "content" => $content));
    }

    /**
     * Show a header information to the console.
     *
     * @access public
     * @param mixed $content
     * @param string $color
     * @param string $background
     * @return array
     */
    public function header($content, $color = "blue", $background = "white")
    {
        return array_push($this->buffer, array(
                                            "action"        => "HEADER",
                                            "content"       => $content,
                                            "color"         => $color,
                                            "background"    => $background
                                         ));
    }



    /**
     * Display the console message .
     *
     * @access public
     * @return void
     */
    public function show()
    {

        $html = "";

        foreach ($this->buffer as $data) {

            $content = (is_array($data['content'])) ? json_encode($data['content']) : $data['content'];
            $content = str_replace(array("\r\n", "\r", "\n"), '\n', $content);
            $content = str_replace("'", "\\'", $content);

            switch ($data['action']) {
                case "LOG":
                    $html .= "console.log('$content');";
                    break;
                case "ERROR":
                    $html .= "console.error('$content');";
                    break;
                case "WARN":
                    $html .= "console.warn('$content');";
                    break;
                case "COUNT":
                    $html .= "console.count('$content');";
                    break;
                case "HEADER":

                    $color      = $data['color'];
                    $background = $data['background'];

                    $html .= "console.log('%c$content', " .
                             "'color: $color; background: $background; font-size: 20px;');";
                    break;
            }

        }

        print "<script>". $html ."</script>";
    }
}
