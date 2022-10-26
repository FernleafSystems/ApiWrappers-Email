<?php

namespace FernleafSystems\ApiWrappers\Email\Common\Data;

class CleanNames {

	/**
	 * @param string $name
	 * @return string[]
	 */
	public function name( $name ) {
		[ $first, $last ] = array_filter( explode( ' ', trim( $name ), 2 ) );
		return $this->names( (string)$first, (string)$last );
	}

	/**
	 * @param string $first
	 * @param string $last
	 * @return string[] - size 2, 1st item is Firstname, 2nd item is surname
	 */
	public function names( $first, $last ) {
		$first = trim( (string)$first );
		$last = trim( (string)$last );

		// If last name is empty, and there's a space in the first name, split it
		if ( empty( $last ) && strpos( $first, ' ' ) ) {

			// we don't break up names with
			$aSpecialCases = [ 'de', 'van' ];
			$bIsSpecialCase = false;
			foreach ( $aSpecialCases as $sCase ) {
				if ( stripos( $first, " $sCase " ) ) {
					$bIsSpecialCase = true;
					break;
				}
			}

			if ( !$bIsSpecialCase ) {
				[ $first, $last ] = explode( ' ', $first, 2 );
			}
		}

		// Uppercase all words
		$sPregPattern = '/@|[0-9]+/';
		$first = preg_replace( $sPregPattern, '', ucwords( strtolower( $first ) ) );
		$last = preg_replace( $sPregPattern, '', ucwords( $last ) );

		// Then if there's "van" or "de" ensure they are lower-cased
		$aSpecialConversions = [
			'Van' => 'van',
			'De'  => 'de'
		];
		foreach ( $aSpecialConversions as $sFrom => $sTo ) {
			$first = str_replace( " $sFrom ", " $sTo ", $first );
			$last = str_replace( " $sFrom ", " $sTo ", $last );
		}

		return [ $first, $last ];
	}
}