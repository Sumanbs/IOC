<?php
class App
{
    /**
     * @var Contact
     */
    private $contact;
    /**
     * @param Container
     */
    public function __construct(Container $container)
    {
        $this->contact = $container->getContact();
    }
    /**
     * @message - Calls message function in the function
     */
    public function message()
    {
        return $this->contact->message();
    }
}
class Contact
{
    /**
     * @var Message
     */
    private $message;
    /**
     * @param Container
     */
    public function __construct(Container $container)
    {
        $this->message = $container->getMessage();
    }
    /**
     * @message - Calls message function in the function
     */
    public function message()
    {
        return $this->message->doGet();
    }
}
class Message
{
    /**
     * @doGet - ending message
     */
    public function doGet()
    {
        return "Sending message : Hello";
    }
}
class Container
{
    /**
     * @getContact - gives the object of the Contact
     * @return Contact
     */
    public function getContact()
    {
        return new Contact($this);
    }
    /**
     * @getMessage - gives the object of the Message
     * @return Message
     */
    public function getMessage()
    {
        return new Message();
    }
}
$var = new Container();
$app = new App($var);
echo $app->message() . "\n";
