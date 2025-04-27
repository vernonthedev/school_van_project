import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:intl/intl.dart';

class TripFilters extends StatelessWidget {
  final DateTimeRange? selectedDateRange;
  final String filterStatus;
  final Function(DateTimeRange?, String) onFiltersChanged;

  const TripFilters({
    super.key,
    required this.selectedDateRange,
    required this.filterStatus,
    required this.onFiltersChanged,
  });

  Future<void> _selectDateRange(BuildContext context) async {
    final DateTimeRange? picked = await showDateRangePicker(
      context: context,
      firstDate: DateTime(2020),
      lastDate: DateTime(2030),
      initialDateRange: selectedDateRange,
    );
    onFiltersChanged(picked, filterStatus);
  }

  @override
  Widget build(BuildContext context) {
    return Card(
      margin: const EdgeInsets.all(16),
      elevation: 4,
      shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
      child: Padding(
        padding: const EdgeInsets.all(12),
        child: Column(
          children: [
            Row(
              children: [
                Expanded(
                  child: OutlinedButton.icon(
                    icon: const Icon(Icons.calendar_today, size: 16),
                    label: Text(
                      selectedDateRange == null
                          ? 'Select Date'
                          : '${DateFormat('MMM d').format(selectedDateRange!.start)} - ${DateFormat('MMM d').format(selectedDateRange!.end)}',
                      style: GoogleFonts.poppins(),
                    ),
                    onPressed: () => _selectDateRange(context),
                  ),
                ),
                const SizedBox(width: 12),
                Expanded(
                  child: DropdownButtonFormField<String>(
                    value: filterStatus,
                    items:
                        [
                              'All',
                              'Scheduled',
                              'In Progress',
                              'Completed',
                              'Cancelled',
                            ]
                            .map(
                              (status) => DropdownMenuItem(
                                value: status,
                                child: Text(status),
                              ),
                            )
                            .toList(),
                    onChanged: (value) {
                      onFiltersChanged(selectedDateRange, value!);
                    },
                    decoration: InputDecoration(
                      labelText: 'Status',
                      border: OutlineInputBorder(
                        borderRadius: BorderRadius.circular(8),
                      ),
                      contentPadding: const EdgeInsets.symmetric(
                        horizontal: 12,
                      ),
                    ),
                  ),
                ),
              ],
            ),
            const SizedBox(height: 8),
            ElevatedButton(
              onPressed: () {
                onFiltersChanged(null, 'All');
              },
              style: ElevatedButton.styleFrom(
                minimumSize: const Size(double.infinity, 48),
                backgroundColor: Colors.grey[200],
                foregroundColor: Colors.black87,
              ),
              child: Text('Reset Filters', style: GoogleFonts.poppins()),
            ),
          ],
        ),
      ),
    );
  }
}
