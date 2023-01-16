import java.util.Objects;
import java.util.Optional;
import java.util.List;
import static java.lang.System.out;
import static java.util.Comparator.comparing;
import static java.util.stream.Collectors.maxBy;
import java.util.stream.Collectors;
import java.util.Comparator;

public class CapitalCityHighPopulation {

    public static void main(String[] args) {
        CountryDao countryDao = InMemoryWorldDao.getInstance();
        CityDao cityDao = InMemoryWorldDao.getInstance();
        
		Optional<City> CityHighPopulation = countryDao.findAllCountries()
                .stream()
		.map(Country::getCapital)
		.map(cityDao::findCityById)
		.filter(Objects::nonNull)
		.max(Comparator.comparing(City::getPopulation));
				
		 CityHighPopulation.ifPresent(System.out::println);
		
    }

}
