<?php


namespace Oh86\Encrypt;



class Bcrypt
{

    /**
     * The default cost factor.
     *
     * @var int
     */
    protected $rounds = 10;

    /**
     * Create a new hasher instance.
     *
     * @return void
     */
    public function __construct(?int $rounds = null)
    {
        $this->rounds = $rounds ?? $this->rounds;
    }

    /**
     * Hash the given value.
     *
     * @param  string  $value
     * @return string
     *
     * @throws \RuntimeException
     */
    public function encrypt(string $value)
    {
        $hash = password_hash($value, PASSWORD_BCRYPT, [
            'cost' => $this->cost(),
        ]);

        if ($hash === false) {
            throw new \RuntimeException('Bcrypt hashing not supported.');
        }

        return $hash;
    }

    /**
     * Check the given plain value against a hash.
     *
     * @param  string  $value
     * @param  string  $hashedValue
     * @return bool
     */
    public function check(string $value, string $hashedValue)
    {
        if (strlen($hashedValue) === 0) {
            return false;
        }

        return password_verify($value, $hashedValue);
    }

    /**
     * Check if the given hash has been hashed using the given options.
     *
     * @param  string  $hashedValue
     * @param  array   $options
     * @return bool
     */
    public function needsRehash($hashedValue)
    {
        return password_needs_rehash($hashedValue, PASSWORD_BCRYPT, [
            'cost' => $this->cost(),
        ]);
    }

    /**
     * Set the default password work factor.
     *
     * @param  int  $rounds
     * @return $this
     */
    public function setRounds($rounds)
    {
        $this->rounds = (int) $rounds;

        return $this;
    }

    /**
     * Extract the cost value from the options array.
     * @return int
     */
    protected function cost()
    {
        return $this->rounds;
    }

    /**
     * Get information about the given hashed value.
     *
     * @param  string $hashedValue
     * @return array
     */
    public function info($hashedValue)
    {
        return password_get_info($hashedValue);
    }
}