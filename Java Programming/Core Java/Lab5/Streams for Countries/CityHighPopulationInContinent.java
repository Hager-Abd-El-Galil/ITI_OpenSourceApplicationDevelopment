import java.util.Comparator;
import java.util.Map;
import java.util.Optional;
import java.util.function.BiConsumer;
import java.util.stream.Collector;
import java.util.stream.Collectors;
import java.util.*;



public class CityHighPopulationInContinent {

    public static void main(String[] args) {
        CountryDao countryDao = InMemoryWorldDao.getInstance();
		
        Map<String,List<Country>> CityHighPopulation = countryDao.findAllCountries()
		.stream()
		.collect(Collectors.groupingBy(Country::getContinent));
		
		for(List<Country> countries : CityHighPopulation.values()){
		List<City> city = (countries
			.stream()
			.map(c -> c.getCities()			
			.stream()
			.max(Comparator.comparingInt(City::getPopulation)))	
			.filter(Optional::isPresent)
			.map(Optional::get)
			.max(Comparator.comparingInt(City::getPopulation))
			.stream()
			.peek(System.out::println)	
			.collect(Collectors.toList()));
		}

    }

}
