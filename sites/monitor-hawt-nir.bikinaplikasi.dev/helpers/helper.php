<?php

function Cipher($input, $oldAlphabet, $newAlphabet, &$output)
{
	$output = "";
	$inputLen = strlen($input);

	if (strlen($oldAlphabet) != strlen($newAlphabet))
		return false;

	for ($i = 0; $i < $inputLen; ++$i)
	{
		$oldCharIndex = strpos($oldAlphabet, strtolower($input[$i]));

		if ($oldCharIndex !== false)
			$output .= ctype_upper($input[$i]) ? strtoupper($newAlphabet[$oldCharIndex]) : $newAlphabet[$oldCharIndex];
		else
			$output .= $input[$i];
	}

	return true;
}

function Encipher($input, $cipherAlphabet, &$output)
{
	$plainAlphabet = "abcdefghijklmnopqrstuvwxyz";
	return Cipher($input, $plainAlphabet, $cipherAlphabet, $output);
}

function Decipher($input, $cipherAlphabet, &$output)
{
	$plainAlphabet = "abcdefghijklmnopqrstuvwxyz";
	return Cipher($input, $cipherAlphabet, $plainAlphabet, $output);
}
