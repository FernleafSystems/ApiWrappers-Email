<?php

namespace FernleafSystems\ApiWrappers\Email\Common\Data;

/**
 * Class CleanNames
 * @package FernleafSystems\ApiWrappers\Email\Common\Data
 */
class CleanNames {

	/**
	 * @param string $sName
	 * @return string[]
	 */
	public function name( $sName ) {
		list( $sFirstName, $sLastName ) = array_filter( explode( ' ', trim( $sName ), 2 ) );
		return $this->names( $sFirstName, $sLastName );
	}

	/**
	 * @param string $sFirstName
	 * @param string $sLastName
	 * @return string[] - size 2, 1st item is Firstname, 2nd item is surname
	 */
	public function names( $sFirstName, $sLastName ) {
		$sFirstName = trim( (string)$sFirstName );
		$sLastName = trim( (string)$sLastName );

		// If last name is empty, and there's a space in the first name, split it
		if ( empty( $sLastName ) && strpos( $sFirstName, ' ' ) ) {

			// we don't break up names with
			$aSpecialCases = array( 'de', 'van' );
			$bIsSpecialCase = false;
			foreach ( $aSpecialCases as $sCase ) {
				if ( stripos( $sFirstName, " $sCase " ) ) {
					$bIsSpecialCase = true;
					break;
				}
			}

			if ( !$bIsSpecialCase ) {
				list( $sFirstName, $sLastName ) = explode( ' ', $sFirstName, 2 );
			}
		}

		// Uppercase all words
		$sPregPattern = '/\@|[0-9]+/';
		$sFirstName = preg_replace( $sPregPattern, '', ucwords( strtolower( $sFirstName ) ) );
		$sLastName = preg_replace( $sPregPattern, '', ucwords( $sLastName ) );

		// Then if there's "van" or "de" ensure they are lower-cased
		$aSpecialConversions = array(
			'Van' => 'van',
			'De'  => 'de'
		);
		foreach ( $aSpecialConversions as $sFrom => $sTo ) {
			$sFirstName = str_replace( " $sFrom ", " $sTo ", $sFirstName );
			$sLastName = str_replace( " $sFrom ", " $sTo ", $sLastName );
		}

		return [ $sFirstName, $sLastName ];
	}
}